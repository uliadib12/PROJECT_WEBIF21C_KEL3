<?php

namespace App\Controllers;

use TCPDF;

class PrintSertifikat extends BaseController
{
    public function index()
    {
        return view('cetak');
    }


    public function convertToPdf()
    {
        // Menerima data gambar dari request
        $screenshotData = $this->request->getPost('screenshotData');

        // Mengubah base64 data URL menjadi gambar dan menyimpannya
        $screenshotData = str_replace('data:image/png;base64,', '', $screenshotData);
        $screenshotData = base64_decode($screenshotData);

        // Buat objek TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Atur properti dokumen PDF
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Screenshot to PDF');
        $pdf->SetSubject('Screenshot to PDF Conversion');
        $pdf->SetKeywords('screenshot, pdf, convert');

        // Menambahkan halaman tunggal
        $pdf->AddPage();
        $pdf->SetPageOrientation('L');
        // Menyimpan gambar ke file
        $screenshotPath = WRITEPATH . 'screenshot.png';
        file_put_contents($screenshotPath, $screenshotData);

        // Menambahkan gambar ke halaman PDF
        list($imageWidth, $imageHeight) = getimagesize($screenshotPath);

        // Menentukan ukuran halaman berdasarkan orientasi
        $pageWidth = $pdf->getPageWidth();
        $pageHeight = $pdf->getPageHeight();

        // Menghitung skala proporsional untuk menyesuaikan gambar dengan halaman PDF
        $scale = min($pageWidth / $imageWidth, $pageHeight / $imageHeight);

        // Menghitung ukuran gambar yang disesuaikan
        $adjustedWidth = $imageWidth * $scale;
        $adjustedHeight = $imageHeight * $scale;

        // Mengatur posisi dan ukuran gambar dalam halaman PDF
        $x = ($pageWidth - $adjustedWidth) / 2;
        $y = ($pageHeight - $adjustedHeight) / 2;

        // Menambahkan gambar ke halaman PDF
        $pdf->Image($screenshotPath, $x, $y, $adjustedWidth, $adjustedHeight, 'PNG');

        // Menghapus file screenshot yang dihasilkan
        unlink($screenshotPath);

        // Mengambil konten PDF dalam bentuk string
        $pdfContent = $pdf->Output('screenshot.pdf', 'D');

        // Mengirimkan file PDF untuk diunduh
        return $this->response->download($pdfContent, null, true, 'screenshot.pdf');
    }
}