import DataTable from 'datatables.net-dt'
import 'datatables.net-dt'

// import JSZip from 'jszip'; // For Excel export
// import PDFMake from 'pdfmake'; // For PDF export
 
// import 'datatables.net-buttons/js/buttons.html5.mjs';
// import 'datatables.net-buttons/js/buttons.print.mjs';
// import 'datatables.net-buttons/js/buttons.colVis.mjs';

// DataTable.Buttons.jszip(JSZip);
// DataTable.Buttons.pdfMake(PDFMake);



$(function() {
    
    $('#aside-toggler').on('click', () => {
        $('.tinker-pro-pos').toggleClass('collapse-sidebar')
    })


    let table = new DataTable('.datatable', {
        responsive: true,
        // dom: 'Bfrtip',
        buttons: [
            'colvis',
            'excel',
            'print'
        ]
    });
    // console.log($('#tax_fixed').prop('checked', true))

    // change admin profile
    $('#admin-profile-file').on('change', () => {
        const file = $('#admin-profile-file').prop('files')[0];

        const reader = new FileReader;

        reader.onload = (e) => {
            $('#admin-profile-previewer').attr('src', e.target.result)
            
        }
        reader.readAsDataURL(file)
    })

    // for fixing product markup
    $('#fixed_markup').on('change', () => {
        if($('#fixed_markup').prop('checked')) {
            $('#markup-indicator').text('$')
        } else {
            $('#markup-indicator').text('%')
        }
    })
})