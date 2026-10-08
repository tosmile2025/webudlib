
const txtbanner = document.querySelectorAll("#txt-slide");
fetch('product.json')
.then(function (response){
    return response.json()
})
.then(function (data){
    appendData(data)
})
.catch(function (err){
    console.log('error:'+err);
})

function appendData(data){
    var  mainContainer = document.getElementById("mydata");
    console.log(JSON.stringify(data.name));
}
