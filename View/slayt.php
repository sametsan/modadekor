<script>
    var acikolan;
    var adet;
    var div;
    var i = 0;
    var gosterilen = 0;

    function fadeclose(div) {
        var start = 100;
        setTimeout("fadeCloseDiv(" + start + ",'" + div + "');", 1);
        document.getElementById(div).style.display = "none";
    }

    function fadeCloseDiv(suan, div) {
        if (suan >= 0) {
            self.document.getElementById(div).style.filter = "alpha(opacity=" + suan + ");";
            self.document.getElementById(div).style.opacity = +suan;
            var yenisuan = suan - 5;
            setTimeout("fadeCloseDiv(" + yenisuan + ",'" + div + "');", 1);
        }
    }

    function fadeopen(div) {
        var start = 0;
        // document.getElementById(div).style.display="compact";
        document.getElementById(div).style.display = "block";
        setTimeout("fadeOpenDiv(" + start + ",'" + div + "');", 1);
    }

    function fadeOpenDiv(suan, div) {
        if (suan < 100) {
            self.document.getElementById(div).style.filter = "alpha(opacity=" + suan + ");";
            suan2 = suan / 100;
            self.document.getElementById(div).style.opacity = suan2;
            var yenisuan = suan + 5;
            setTimeout("fadeOpenDiv(" + yenisuan + ",'" + div + "');", 50);
        }
    }

    function goster(div) {

        buton(0);
        gosterilen = div;
        buton(1);
        div = "resim[" + div + "]";

        if (acikolan)
            fadeclose(acikolan);
        acikolan = div;
        fadeopen(div);
    }


    function oto() {
        goster(i);
        i++;
        if (i > adet)
            i = 0;
        setTimeout("oto();", 5000);
    }

    function dugme(no) {
        goster(no);
        no++;
        i = no;
        if (i > adet)
            i = 0;
    }

    function ileri() {
        no = gosterilen + 1;
        if (no > adet)
            no = 0;
        goster(no);
    }


    function geri() {
        no = gosterilen - 1;
        if (no < 0)
            no = adet;
        goster(no);
    }

    function buton(no) {
        if (no == 1)
            self.document.getElementById("buton[" + gosterilen + "]").className = "slayt-liste-buton-goster"
        if (no == 0)
            self.document.getElementById("buton[" + gosterilen + "]").className = "slayt-liste-buton"
    }
</script>

<body onLoad="oto()">
    <div class=slayt>

        <div class=slayt-sol>
            <a class=slayt-sol-sol onclick="geri()"></a>
        </div>
        <div class=slayt-govde>




            <div class=slayt-orta>
                <?
                $i = 0;

                foreach($slayt as $resim){
                    echo "<img  id=resim[$i] src='$resim' >";
                    $i += 1;
                }
                 ?>
            </div>



            <script>
                adet = <?= $i ?>;
            </script>


            <div class=slayt-liste>
                <div class=slayt-liste-dugme>
                    <?
                    for ($a = 0; $a <= $i; $a++) {
                        echo "<a id=buton[$a] class=slayt-liste-buton  onclick=\"dugme($a)\"></a>";
                    }
                    ?>
                </div>
            </div>

        </div>


        <div class=slayt-sag>
            <a class=slayt-sag-sag onclick="ileri()"></a>
        </div>
    </div>