(
    ()=>{
        const Request = async ()=>{
            const min = -5;
            const max = 30;
            const device_id = document.querySelector('#device_id').value;
            fetch('http://weather963.freehost.io/api_get/?device_id='+device_id)
            .then(function(response) {
                return response.json();
            }).then(function(data) {
                document.querySelector('#temp').innerHTML= data.themp;
            }).catch(function(err) {
                console.log('Fetch Error :-S', err);
            });
        }
        setInterval(Request,800);
    }
)();