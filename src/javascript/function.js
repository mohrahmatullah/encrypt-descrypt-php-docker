window.onload = function(){
    /* Select */
    var plainTextE = document.getElementById('plainTextE');
    var ivE = document.getElementById('ivE');
    var keyE = document.getElementById('keyE');
    var resultE = document.getElementById('resultE');

    var plainTextD = document.getElementById('plainTextD');
    var ivD = document.getElementById('ivD');
    var keyD = document.getElementById('keyD');
    var resultD = document.getElementById('resultD');

    var url = '/api/function.php';
    
    const varButton = {
        encrypt: document.getElementById('btn-encrypt'),
        decrypt: document.getElementById('btn-decrypt')
    }

    varButton.encrypt.onclick = function(){
        getListE();
    }

    varButton.decrypt.onclick = function(){
        // console.log('test');
        getListD();
    }

    function dataE() {
        var objdata = {
            text: plainTextE.value,
            iv: ivE.value,
            key: keyE.value
        }

        return objdata;
    }

    function dataD() {
        var objdata = {
            text: plainTextD.value,
            iv: ivD.value,
            key: keyD.value
        }

        return objdata;
    }

    function getListE() {
        requestList(dataE(), 'encrypt', url);
    }

    function getListD() {
        requestList(dataD(), 'decrypt', url);
    }

    function requestList(data, method, url) {
        $.ajax({
            url: url,
            type: 'post',
            data: {
                reason: method,
                data: data
            },
            success: function (hasil) { 
            console.log(hasil);     
                if(method == 'encrypt'){
                    resultE.value = hasil;
                }else if(method == 'decrypt'){
                    resultD.value = hasil;
                }
            }
        });
    }

};
