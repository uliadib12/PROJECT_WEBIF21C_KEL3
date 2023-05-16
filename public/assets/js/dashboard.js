function Side(){
    const navbar = document.getElementsByClassName('navbar')[0];
    const navtop = document.getElementsByClassName('navtop')[0];
    const avatar = document.getElementsByClassName('avatar-navbar')[0];
    const items = document.getElementsByClassName('items')[0];
    const toggleX = document.getElementsByClassName('close-toggle')[0];

    if(navbar.style.width=="0px" && window.innerWidth <= 750){
        toggleX.style.display = "block";
        navbar.style.position = "absolute";
        navbar.style.width="175px";
        // navtop.style.position = "relative";
        avatar.style.display="block";
        items.style.display="block";
        navbar.style.padding="20px";

        
    
    }else if(navbar.style.width=="0px" && window.innerWidth >= 750){
        navbar.style.width="175px";
        avatar.style.display="block";
        items.style.display="block";
        navbar.style.padding="20px";
    }
    else{
        navbar.style.width="0px";
        avatar.style.display="none";
        items.style.display="none";
        navbar.style.padding="0px";
        toggleX.style.display= "none";


    }

}
function togglekecil(){
    const navbar = document.getElementsByClassName('navbar')[0];
    const navtop = document.getElementsByClassName('navtop')[0];
    const avatar = document.getElementsByClassName('avatar-navbar')[0];
    const items = document.getElementsByClassName('items')[0];
    const toggleX = document.getElementsByClassName('close-toggle')[0];

    navbar.style.width="0px";
    avatar.style.display="none";
    items.style.display="none";
    navbar.style.padding="0px";
    toggleX.style.display= "none";    
}

window.addEventListener('resize', function() {
    if (window.innerWidth > 100) { 
        const navbar = document.getElementsByClassName('navbar')[0];
        const navtop = document.getElementsByClassName('navtop')[0];
        const avatar = document.getElementsByClassName('avatar-navbar')[0];
        const items = document.getElementsByClassName('items')[0];
        const toggleX = document.getElementsByClassName('close-toggle')[0];

        navbar.style.width="0px";
        navbar.style.position = "relative";
        avatar.style.display="none";
        items.style.display="none";
        navbar.style.padding="0px";
        toggleX.style.display= "none";  
    }
})

const navItems = document.querySelectorAll('.nav-item');

navItems.forEach((item, index) => {
  item.addEventListener('click', () => {
    if(item.getAttribute('id') == "Penjadwalan_link"){
        window.location.href = 'penjadwalan';
    }else if(item.getAttribute('id') == "Dashboard_link"){
        window.location.href = 'dashboard';
    }else if(item.getAttribute('id') == "Laporan_link"){
        window.location.href = 'laporan';
    }
    else if(item.getAttribute('id') == "Pengingat_link"){
        window.location.href = 'pengingat';
    }else if(item.getAttribute('id') == "Data_Mitra_link"){
        window.location.href = 'data_mitra';
    }else if(item.getAttribute('id') == "Sertifikat_link"){
        window.location.href = 'sertifikat';
    }
    
  });
});



// operasi table

function TambahData(){
    var formInput = document.getElementsByClassName("form-isi-data")[0];
    formInput.submit();
}

