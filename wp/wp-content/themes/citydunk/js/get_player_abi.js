if (document.getElementById("player-pos-0")) {
    var allNameList;
    var allAbility;

    // Get all elements.
    var pos_0 = document.getElementById("player-pos-0");
    pos_0.pname = document.getElementById("player-name-0");

    var pos_1 = document.getElementById("player-pos-1");
    pos_1.pname = document.getElementById("player-name-1");
    var table = document.getElementById("player-abi-compare");
    var result = document.getElementById("player-ability-result");

    if (pos_0 && pos_1) {
        // Get data from API asynchronously.
        getAllFromAPI(
                'nameList',
                function () {
                    pos_0.addEventListener("change", createSelectOptionsByPosition);
                    pos_1.addEventListener("change", createSelectOptionsByPosition);
                });
        getAllFromAPI(
                'all',
                function () {
                    pos_0.pname.addEventListener("change", showAbility);
                    pos_1.pname.addEventListener("change", showAbility);
                });
    }

    // view_site_btn.addEventListener("click", function() );
    // Get json data from google API.
    function getAllFromAPI (api_tar, event_callback) {
        var r = new XMLHttpRequest();
        r.open('GET', 'https://script.google.com/macros/s/AKfycbxjnSMQqjayZQGz-Sa5YQi-9zr1EOrHpk-ALUSMBBqZ_tXTm9c/exec?target=' + api_tar, true);
        r.onload = function () {
            if (r.status >= 200 && r.status < 400) {
                if (api_tar == 'nameList') {
                    allNameList = JSON.parse(r.responseText);
                } else if (api_tar == 'all') {
                    allAbility = JSON.parse(r.responseText);
                    console.log("all setted");
                }
                event_callback();
            }
        };
        r.onerror = function() {
            console.log("Connection error");
        }
        r.send();
    }

    function createSelectOptionsByPosition () {
        if (!allNameList) return;
        pos = this.options[this.selectedIndex].value;
        var HTMLString = '';
        if (pos) {
            for (var name of allNameList[pos]) {
                HTMLString += '<option value="' + name + '">' + name + '</option>';
            }
        }
        event.target.pname.innerHTML = HTMLString;
    }

    function showAbility () {
        if (!allAbility) return;
        var s = {left:{}, right:{}};

        if (this.id == 'player-name-0') {
            s.left.p = pos_0.options[pos_0.selectedIndex].value;
            s.left.n = this.options[this.selectedIndex].value;
            if (pos_1.pname.options[pos_1.pname.selectedIndex]) {
                s.right.p = pos_1.options[pos_1.selectedIndex].value;
                s.right.n = pos_1.pname.options[pos_1.pname.selectedIndex].value;
            }
        } else if (this.id == 'player-name-1') {
            if (pos_0.pname.options[pos_0.pname.selectedIndex]) {
                s.left.p = pos_0.options[pos_0.selectedIndex].value;
                s.left.n = pos_0.pname.options[pos_0.pname.selectedIndex].value;
            }
            s.right.p = pos_1.options[pos_1.selectedIndex].value;
            s.right.n = this.options[this.selectedIndex].value;
        }
        var ta = [["入手方法",
                   "ミドル", "3ポイント", "ダンク", "レイアップ",
                   "パス", "ドリブル", "リバウンド", "ブロックs",
                   "対抗", "ジャンプ", "スティール", "ラン", "総合",
                   "天賦 1", "天賦 2", "天賦 3",
                   "天賦 金", "天賦 金", "天賦 他", "天賦 他", "評価解放"]];
        Object.entries(s).forEach(([k,v]) => {
            if (Object.keys(v).length) {
                ta.push(allAbility[v.p][v.n]);
            } else {
                ta.push(new Array(22).fill(""));
            }
        });
        var table_row_cnt = table.rows.length;
        if (table_row_cnt > 2){
            for (var i = 2; i < table_row_cnt; i++) {
                table.deleteRow(2);
            }
        }
        for (var i = 0; i < ta[0].length; i++) {
            var row = table.insertRow(-1);
            var menu = ta[0][i];
            var left = ta[1][i];
            var right = ta[2][i];

            var cell_0 = row.insertCell(-1);
            cell_0.appendChild(document.createTextNode(menu));
            var cell_1 = row.insertCell(-1);
            var cell_2 = row.insertCell(-1);

            if (i > 0 && i <= 13) {
                left = parseInt(left, 10);
                right = parseInt(right, 10);
                if (left > right) {
                    var diff = Math.abs(left-right).toString();
                    left = left.toString() + '(+' +  diff + ')';
                    right = right.toString() + '(-' +  diff + ')';
                    cell_1.style.backgroundColor = "#fffacd";
                } else if (left < right) {
                    var diff = Math.abs(right-left).toString();
                    left = left.toString() + '(-' +  diff + ')';
                    right = right.toString() + '(+' +  diff + ')';
                    cell_2.style.backgroundColor = "#fffacd";
                }

                if (i == 13) {
                    cell_0.style.fontWeight = "bold";
                    cell_1.style.fontWeight = "bold";
                    cell_2.style.fontWeight = "bold";
                }
            }
            if (i > 17) {
                cell_1.innerHTML = left.toString().replace(/\n/g, '<br>');
                cell_2.innerHTML = right.toString().replace(/\n/g, '<br>');
            } else {
                cell_1.appendChild(document.createTextNode(left));
                cell_2.appendChild(document.createTextNode(right));
            }
        }
    }
}
