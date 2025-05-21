<html>

<head>
    <meta charset="UTF-8">
    <title>Notificaciones JavaScript</title>
    <script charset="UTF-8">
        //    function notifyMe() {
        //         //Vamos a comprobar si el navegador es compatible con las notificaciones
        //         if (!("Notification" in window)) {
        //             alert("This browser does not support desktop notification");
        //         }
        //         // Vamos a ver si ya se han concedido permisos de notificación
        //         else if (Notification.permission === "granted") {
        //             // Si está bien vamos a crear una notificación
        //             var body = "Hola ";
        //             var icon = "https://www.quecodigo.com/img/qc_logo.jpg";
        //             var title = "Notificación";
        //             var options = {
        //                 body: body,
        //                 icon: icon,
        //                 lang: "ES",
        //                 renotify: "true"
        //             }
        //             var notification = new Notification(title, options);
        //             var audio = new Audio('https://www.quecodigo.com/web/antigua/sounds/notificacion.mp3');
        //             audio.play();
        //             notification.onclick = function() {
        //                 //action
        //             };
        //             setTimeout(notification.close.bind(notification), 5000);
        //         }
        //         // De lo contrario, tenemos que pedir permiso al usuario
        //         else if (Notification.permission !== 'denied') {
        //             Notification.requestPermission(function(permission) {
        //                 // Si el usuario acepta, vamos a crear una notificación
        //                 if (permission === "granted") {
        //                     var notification = new Notification("Gracias, Ahora podras recibir notifiaciones de nuestra página");
        //                 }
        //             });
        //         }
        //         // Por fin, si el usuario ha denegado notificaciones, y usted
        //         // Quiere ser respetuoso no hay necesidad de preocuparse más sobre ellos.
        //     }
        // 
    </script>
</head>

<body onload="notifyMe()">
    <!-- <button onclick="notifyMe()">Notificame!</button> -->
    <!-- <script>
            function autoRefresh(){
                window.location = window.location.href;
            }
            setInterval('autoRefresh()',120000);
        </script>
    <p>Esta página se actualizará cada 2 minutos</p> -->

    <div class="row gutters-xs">
        <div class="col-5">
            <select name="user[month]" class="form-control custom-select select2 select2-hidden-accessible" data-select2-id="8" tabindex="-1" aria-hidden="true">
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option selected="selected" value="06" data-select2-id="10">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="9" style="width: 315.95px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-usermonth-v3-container"><span class="select2-selection__rendered" id="select2-usermonth-v3-container" role="textbox" aria-readonly="true" title="June">June</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        </div>

        <div class="col-3">
            <select name="user[day]" class="form-control custom-select select2 select2-hidden-accessible" data-select2-id="11" tabindex="-1" aria-hidden="true">
                <option value="">Day</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option selected="selected" value="20" data-select2-id="13">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="12" style="width: 186.367px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-userday-j4-container"><span class="select2-selection__rendered" id="select2-userday-j4-container" role="textbox" aria-readonly="true" title="20">20</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        </div>
        <div class="col-4">
            <select name="user[year]" class="form-control custom-select select2 select2-hidden-accessible" data-select2-id="14" tabindex="-1" aria-hidden="true">
                <option value="">Year</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option selected="selected" value="1989" data-select2-id="16">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
                <option value="1949">1949</option>
                <option value="1948">1948</option>
                <option value="1947">1947</option>
                <option value="1946">1946</option>
                <option value="1945">1945</option>
                <option value="1944">1944</option>
                <option value="1943">1943</option>
                <option value="1942">1942</option>
                <option value="1941">1941</option>
                <option value="1940">1940</option>
                <option value="1939">1939</option>
                <option value="1938">1938</option>
                <option value="1937">1937</option>
                <option value="1936">1936</option>
                <option value="1935">1935</option>
                <option value="1934">1934</option>
                <option value="1933">1933</option>
                <option value="1932">1932</option>
                <option value="1931">1931</option>
                <option value="1930">1930</option>
                <option value="1929">1929</option>
                <option value="1928">1928</option>
                <option value="1927">1927</option>
                <option value="1926">1926</option>
                <option value="1925">1925</option>
                <option value="1924">1924</option>
                <option value="1923">1923</option>
                <option value="1922">1922</option>
                <option value="1921">1921</option>
                <option value="1920">1920</option>
                <option value="1919">1919</option>
                <option value="1918">1918</option>
                <option value="1917">1917</option>
                <option value="1916">1916</option>
                <option value="1915">1915</option>
                <option value="1914">1914</option>
                <option value="1913">1913</option>
                <option value="1912">1912</option>
                <option value="1911">1911</option>
                <option value="1910">1910</option>
                <option value="1909">1909</option>
                <option value="1908">1908</option>
                <option value="1907">1907</option>
                <option value="1906">1906</option>
                <option value="1905">1905</option>
                <option value="1904">1904</option>
                <option value="1903">1903</option>
                <option value="1902">1902</option>
                <option value="1901">1901</option>
                <option value="1900">1900</option>
                <option value="1899">1899</option>
                <option value="1898">1898</option>
                <option value="1897">1897</option>
            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="15" style="width: 251.167px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-useryear-vs-container"><span class="select2-selection__rendered" id="select2-useryear-vs-container" role="textbox" aria-readonly="true" title="1989">1989</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
        </div>
    </div>

    
</body>

</html>