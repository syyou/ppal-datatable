// Datatable -- HomeTab
$(document).ready(function() {

    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: 'payment/getdata',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
            ]
    });

    console.log('test 2')
});

// Test DataTable
$( "#datatable" ).click(function() {
    alert('data loded');
    console.log('test 1')
});
