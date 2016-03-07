<script>
    var originalCode;
    $(function () {
        $("input[data-hide]").each(function () {
            var toHide = $(this);
            if (toHide.val() == "12/2/2")
                toHide.val("");
        });
        originalCode = $("input[name='code']").val();
        $("#generateBtn").click(function () {
            $("#codeLoader").css("display", "initial");
            $.getJSON("{{ action('LicenseController@generateCode') }}", function (data) {
                $("input[name='code']").val(data.code);
                $("#codeLoader").css("display", "none");
            });
        });
        $("#resetBtn").click(function () {
            $("input[name='code']").val(originalCode);
        });
    });
</script>
<div class="form-group">
    <div id="generateBtn" class="btn btn-primary">
        Generate New Code
    </div>
    <div id="resetBtn" class="btn btn-default">
        Reset Code
    </div>
    <i class="fa fa-spinner fa-spin" id="codeLoader" style="margin-left: 5px; display: none;"></i>
</div>