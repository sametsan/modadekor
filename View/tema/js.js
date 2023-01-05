function giris_goster(d)
{
  
     var giris=document.getElementById("giris");
     var giris_giris=document.getElementById("giris_dugmeler_giris");
     var giris_kapat=document.getElementById("giris_dugmeler_kapat");
     
     
  if(d==1){


  giris_kapat.style.display="block";
      giris_giris.style.display="none";
         giris.style.height=250;
	    giris.style.display="block";
  
  }
  else{
        giris.style.display="none";
      giris.style.height=0;
  giris_giris.style.display="block";
     giris_kapat.style.display="none";
      
  }
}


function ara()
{
var ara=document.getElementById("ara").value;
 location="liste.php?ara="+ara; 
}

function sepete_ekle()
{
 var no=document.getElementById("no").value;
 var adet=document.getElementById("adet").value;
 location="islem.php?no="+no+"&islem=sepet_ekle&adet="+adet; 
}




function sozlesme_kabul()
{
  var onay=document.getElementById("sozlesme_onay").value;
 
  if(onay==1){
  document.getElementById("sozlesme_dugme").disabled = true;
document.getElementById("sozlesme_onay").value=0;
  }
  else
  {
      document.getElementById("sozlesme_dugme").disabled = false;
document.getElementById("sozlesme_onay").value=1;
  }
  
  }


function siparis_iptal(no,durum)
{
confirm("İptal etmek istediğinize emin misiniz?"); 
  location="yonetim_siparisler.php?no="+no+"&sayfa=iptal&durum="+durum;
}


function gir()
{
   var kullanici=document.getElementById("kullanici").value;
 var parola=document.getElementById("parola").value;
  location="islem.php?islem=uye_giris&kullanici="+kullanici+"&parola="+parola;
}

function menu(id,no)
{
    var menu=document.getElementById(id);
    
    if(no==1)
    menu.style.display="block";
    else
      menu.style.display="none";

  
}

