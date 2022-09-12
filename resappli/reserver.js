
// function getSelectedValue(){
//     var selection;
//     selection = document.getElementById("inputGroupSelect01").value;
//     console.log("Onglet selectionné : " + selection);
//     if (selection=="Formation"){
//         console.log(selection)
//         let div = document.getElementsByClassName('formation');

//         let divforma = document.createElement('label');
//         divforma.setAttribute('class','input-group-tex forma');
        
//         let select = document.createElement('select');
//         select.setAttribute('name','selectFormateur');
//         select.setAttribute('class','form-select forma');
//         select.setAttribute('id','inputGroupSelect01');
//         select.setAttribute('disabled');

//         div[0].appendChild(divforma);
//         div[0].appendChild(select);
//     }
//     else{
//         var elements = document.getElementsByClassName('forma');
//         while(elements.length > 0){
//             elements[0].parentNode.removeChild(elements[0]);
//         }
//     }

// }

function fetch_select(val)
{
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}