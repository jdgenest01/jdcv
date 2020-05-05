require('./bootstrap');

document.addEventListener( "DOMContentLoaded", function() {

    let timeType = document.querySelector("#date");
    let addRow = document.querySelector("#addRow");
    let deleteRows = document.querySelectorAll(".deleteRow");


    if( timeType != null ) {

        document.querySelectorAll(".typeRadio").forEach( function ( radio ) {

            radio.onchange = function () {

                let timeDiv = document.querySelector("#timeDiv");
                let duringDiv = document.querySelector("#duringDiv");

                if ( radio.checked && radio.value == "date" ) {

                    timeDiv.classList.remove("d-none");
                    duringDiv.classList.add("d-none");

                } else {

                    timeDiv.classList.add("d-none");
                    duringDiv.classList.remove("d-none");

                }

            }

        } );

    }

    if ( addRow != null ) {

        addRow.onclick = function ( e ) {

            let hiddenRow = document.querySelector("#interactiveBody #hiddenRow");
            let interactiveBody = document.querySelector("#interactiveBody");

            if ( hiddenRow != null ) {

                let itm = hiddenRow.cloneNode(true);
                itm.removeAttribute("id");
                itm.classList.remove("d-none");
                interactiveBody.appendChild(itm);

            }
        }

    }

    if ( deleteRows.length > 0 ) {

        let deletedRows = document.querySelector("#deletedRows");

        document.addEventListener('click',function(e){

            let deleteRow = e.target;

            if ( deleteRow && deleteRow.className.indexOf('deleteRow') != -1 ){

                let row = deleteRow.parentNode.parentNode;
                let idHidden = row.querySelector(".idHidden");

                if ( idHidden != null ) {

                    let id = idHidden.value;

                    if ( id != null ) {

                        if ( deletedRows.value.length > 0 ) {

                            deletedRows.value = deletedRows.value + ',' + id;

                        } else {

                            deletedRows.value = id;

                        }

                    }

                }

                row.parentNode.removeChild(row);
            }
        });

    }
});
