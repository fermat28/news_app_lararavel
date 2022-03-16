<!--footer start-->
{{--<footer class="site-footer">
    <div class="text-center">
        <p>
            &copy; Copyrights <strong>UStudyGuide</strong>. All Rights Reserved
        </p>
        <div class="credits">
            <!--
              You are NOT allowed to delete the credit link to TemplateMag with free version.
              You can delete the credit link only if you bought the pro version.
              Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
              Licensing information: https://templatemag.com/license/
            -->
            By Micpostyam
        </div>

        <a href="{{ asset('assets/profile.html#') }}" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>--}}
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.sparkline.js') }}"></script>
<script src="{{ asset('assets/lib/gritter/js/jquery.gritter.js') }}"></script>
<script src="{{ asset('assets/lib/gritter-conf.js') }}"></script>
<script src="{{ asset('assets/lib/zabuto_calendar.js') }}"></script>
<script src="{{ asset('assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/ijaboCroptool/ijaboCropTool.min.js') }}"></script>
<script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src=" {{ asset('assets/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('assets/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
<!--common script for all pages-->
<script src="{{ asset('assets/lib/common-scripts.js')}}"></script>

<script>
$(document).ready(function(){
    $("a[href='" + window.location.href + "']").addClass("active");
});
</script>
<script>
    $('.sub > li > a').on('click', function (e) {
    e.preventDefault();
    highlight($(this));
    window.location.href = $(this).prop('href') + "#" + $(this).prop("id");
});
function highlight($elem) {
    // reset previously sliding ul
    $('.sidebar-menu > li > a.active').next('ul').slideUp();
    $('.sidebar-menu > li > a').removeClass('active');

    $elem.closest('ul').prev('a').addClass('active');
    $elem.closest('ul').slideDown();
}
var type = window.location.hash.substr(1);
highlight($("#"+type));
</script>

{{--<script>
    $("#spec").focusout(function(e){
     alert($(this).val());
    var niv = $(this).val();
    $.ajax({
        type: "POST",
        url: "{{route('ecoleclasse.api')}}",
        data: {'niv':niv},
        dataType: 'json',
        success : function(data) {
            $('#nom').val(data.nom);
        },
        error: function(response) {
            alert(response.responseJSON.message);
        }
    });
});
</script>--}}

</body>
</html>
