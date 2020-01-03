if (document.getElementById("kizuna-series-result") && document.getElementById("kizuna-theme-result")) {
    getKizunaFromAPI('Kizuna', showKizuna);
}

// Get json data from google API.
function getKizunaFromAPI (tar_api, event_callback) {
    var r = new XMLHttpRequest();
    r.open('GET', 'https://script.google.com/macros/s/AKfycbxjnSMQqjayZQGz-Sa5YQi-9zr1EOrHpk-ALUSMBBqZ_tXTm9c/exec?target=' + tar_api);
    r.onload = function () {
        if (r.status >= 200 && r.status < 400) {
            ret = JSON.parse(r.responseText);
            event_callback(ret);
        }
    };
    r.onerror = function() {
        console.log("Connection error");
    }
    r.send();
}

function showKizuna(data) {
    if (!data) return;
    var results = {series: document.getElementById("kizuna-series-result"),
                   theme: document.getElementById("kizuna-theme-result")};
    Object.keys(data).forEach(function (key) {
        var bk_color = "";
        if (key == "series") {
            bk_color = "#daf2dc";
        } else if (key == "theme") {
            bk_color = "#fac1be";
        }
        for (var d of data[key]) {
            var t = document.createElement("table");
            t.style.width = "80%";
            t.style.border = "solid 1px";
            t.style.margin = "10px";

            var h_c = t.insertRow(-1).insertCell(-1);
            h_c.innerHTML = d[0];
            h_c.style.backgroundColor = bk_color;
            h_c.style.textAlign = "center";
            h_c.style.border = "solid 1px";
            h_c.style.fontWeight = "bold";

            var p_c = t.insertRow(-1).insertCell(-1);
            p_c.innerHTML = d.slice(1, 6).filter(Boolean).join("<br>");
            p_c.style.backgroundColor = "#fff5d6";
            p_c.style.textAlign = "center";
            p_c.style.border = "solid 1px";

            var a_c = t.insertRow(-1).insertCell(-1);
            a_c.innerHTML = d.slice(6).join("<br>");
            a_c.style.backgroundColor = "#dee3fa";
            a_c.style.textAlign = "center";
            a_c.style.border = "solid 1px";

            results[key].appendChild(t);
        }
    });
}
