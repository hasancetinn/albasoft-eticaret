
function displaySuccessMessage(pMessage, pCallBackOnSuccess)
{
    Swal.fire({
        title: Laravel.localeCommon.success + "!",
        text: 'Success',
        type: "success"
    }).then(
        function () {

            if (pCallBackOnSuccess !== undefined && pCallBackOnSuccess !== null) pCallBackOnSuccess();
        }, function (isConfirm) {
            //Not possible
        }
    );
}


function displayWarningMessage(pMessage) {

    Swal.fire({
        title: Laravel.localeCommon.warning + "!",
        text: pMessage,
        type: "warning"
    });
}



function displayErrorMessage(pMessage) {

    Swal.fire({
        title: Laravel.localeCommon.error + "!",
        text: pMessage,
        type: "error"
    });
}





function confirmMessage(pMessage, pCallBackOnSuccess, pSuccessContext, pCallBackOnCancel, pCancelContext ) {


    Swal.fire({
        title: "Are you sure?",
        html: pMessage,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    })
        .then(function(willDelete) {
            if (willDelete.value) {
                if (pCallBackOnSuccess !== undefined && pCallBackOnSuccess !== null) pCallBackOnSuccess(pSuccessContext);
            } else {
                if (pCallBackOnCancel !== undefined && pCallBackOnCancel !== null) pCallBackOnCancel(pCancelContext);
            }
        });


}


function checkMessage(pMessage, pCallBackOnSuccess, pSuccessContext, pCallBackOnCancel, pCancelContext ) {


    Swal.fire({
        title: "Are you sure?",
        html: pMessage,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    })
        .then(function(transferCheckedIn) {
            if (transferCheckedIn.value) {
                if (pCallBackOnSuccess !== undefined && pCallBackOnSuccess !== null) pCallBackOnSuccess(pSuccessContext);
            } else {
                if (pCallBackOnCancel !== undefined && pCallBackOnCancel !== null) pCallBackOnCancel(pCancelContext);
            }
        });


}


// function residenceMessage(pMessage, pCallBackOnSuccess, pSuccessContext, pCallBackOnCancel, pCancelContext ) {
//
//
//     swal({
//         title: "Are you sure?",
//         html: pMessage,
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Download'
//     })
//         .then(function(transferResidence) {
//             if (transferResidence.value) {
//                 if (pCallBackOnSuccess !== undefined && pCallBackOnSuccess !== null) pCallBackOnSuccess(pSuccessContext);
//             } else {
//                 if (pCallBackOnCancel !== undefined && pCallBackOnCancel !== null) pCallBackOnCancel(pCancelContext);
//             }
//         });
//
//
// }





