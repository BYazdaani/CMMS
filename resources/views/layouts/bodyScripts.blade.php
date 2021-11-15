<!-- main JS
    ============================================ -->
<script src="{{asset('../theme/js/main.js')}}"></script>

<!-- jquery
		============================================ -->
<script src="{{asset('../theme/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{asset('../theme/js/bootstrap.min.js')}}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{asset('../theme/js/wow.min.js')}}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{asset('../theme/js/jquery-price-slider.js')}}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{asset('../theme/js/owl.carousel.min.js')}}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{asset('../theme/js/jquery.scrollUp.min.js')}}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{asset('../theme/js/meanmenu/jquery.meanmenu.js')}}"></script>
<!-- counterup JS
    ============================================ -->
<script src="{{asset('../theme/js/counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('../theme/js/counterup/waypoints.min.js')}}"></script>
<script src="{{asset('../theme/js/counterup/counterup-active.js')}}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{asset('../theme/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- jvectormap JS
    ============================================ -->
<script src="{{asset('../theme/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('../theme/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('../theme/js/jvectormap/jvectormap-active.js')}}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('../theme/js/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('../theme/js/sparkline/sparkline-active.js')}}"></script>
<!-- sparkline JS
    ============================================ -->
<script src="{{asset('../theme/js/flot/jquery.flot.js')}}"></script>
<script src="{{asset('../theme/js/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('../theme/js/flot/curvedLines.js')}}"></script>
<script src="{{asset('../theme/js/flot/flot-active.js')}}"></script>
<!-- knob JS
    ============================================ -->
<script src="{{asset('../theme/js/knob/jquery.knob.js')}}"></script>
<script src="{{asset('../theme/js/knob/jquery.appear.js')}}"></script>
<script src="{{asset('../theme/js/knob/knob-active.js')}}"></script>
<!--  wave JS
    ============================================ -->
<script src="{{asset('../theme/js/wave/waves.min.js')}}"></script>
<script src="{{asset('../theme/js/wave/wave-active.js')}}"></script>
<!--  todo JS
    ============================================ -->
<script src="{{asset('../theme/js/todo/jquery.todo.js')}}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{asset('../theme/js/plugins.js')}}"></script>
<!--  Chat JS
    ============================================ -->
<script src="{{asset('../theme/js/chat/moment.min.js')}}"></script>
<script src="{{asset('../theme/js/chat/jquery.chat.js')}}"></script>

<!--  Data Table
    ============================================ -->
<script src="{{asset('../theme/js/data-table/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../theme/js/data-table/data-table-act.js')}}"></script>

<script src="{{asset('../theme/js/bootstrap-select/bootstrap-select.js')}}"></script>

<!-- datapicker JS
       ============================================ -->
<script src="{{asset('../theme/js/datapicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('../theme/js/datapicker/datepicker-active.js')}}"></script>


<script src="{{asset('../theme/js/chosen/chosen.jquery.js')}}"></script>


<!--  Data Table FR
    ============================================ -->
<script>
    dTable = $('#data-table-basic').DataTable({
        "language": {
            "sProcessing": "Traitement en cours ...",
            "sLengthMenu": "Afficher _MENU_ lignes",
            "sZeroRecords": "Aucun résultat trouvé",
            "sEmptyTable": "Aucune donnée disponible",
            "sInfo": "Ligne _START_ à _END_ sur _TOTAL_",
            "sInfoEmpty": "Aucune ligne affichée",
            "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
            "sInfoPostFix": "",
            "sSearch": "Rechercher:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Chargement...",
            "oPaginate": {
                "sFirst": "Premier", "sLast": "Dernier", "sNext": "Suivant", "sPrevious": "Précédent"
            },
            "oAria": {
                "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
            }
        },
    });

    $('#searchBar').keyup(function () {
        dTable.search($(this).val()).draw();   // this  is for customized searchbox with datatable search feature.
    })

</script>

<!-- tawk chat JS
    ============================================ -->
{{--<script src="{{asset('../theme/js/tawk-chat.js')}}"></script>--}}
