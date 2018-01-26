var $table = $('#fresh-table'),
    $alertBtn = $('#alertBtn'),
    full_screen = false;

$().ready(function(){
    $table.bootstrapTable({
        toolbar: ".toolbar",

        showRefresh: false,
        search: true,
        showToggle: true,
        showColumns: true,
        pagination: true,
        striped: true,
        pageSize: 8,
        pageList: [8,10,25,50,100],

        formatShowingRows: function(pageFrom, pageTo, totalRows){
            //do nothing here, we don't want to show the text "showing x of y from..."
        },
        formatRecordsPerPage: function(pageNumber){
            return pageNumber + " rows visible";
        },
        icons: {
            refresh: 'fa fa-refresh',
            toggle: 'fa fa-th-list',
            columns: 'fa fa-columns',
            detailOpen: 'fa fa-plus-circle',
            detailClose: 'fa fa-minus-circle'
        }
    });



    $(window).resize(function () {
        $table.bootstrapTable('resetView');
    });


    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like icon, row: ' + JSON.stringify(row));
            console.log(value, row, index);
        },
        'click .edit': function (e, value, row, index) {
            alert('You click edit icon, row: ' + JSON.stringify(row));
            console.log(value, row, index);
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });

        }
    };


});


function operateFormatter(value, row, index) {
    return [


    ].join('');
}

