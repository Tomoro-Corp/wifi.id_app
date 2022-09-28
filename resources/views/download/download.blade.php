<!DOCTYPE html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Download History AP</title>
    <link rel="shortcut icon" href="/images/telkom-logo-small.png" />
    <!-- <link rel="shortcut icon" href="/assets/favicon.ico"> -->
    <link rel="stylesheet" href="src/down.css">
</head>

<body>
    <div class="container">
        <h1 <center>
            <img src=" /images/wifi.png" style="margin-left: 5px;margin-top: 0px;" width="80">Download History AP
            </center>
        </h1>
        <form class="login-container" action="/download" method="POST">
            @csrf
            <div class="form__message form__message--error"></div>
            <div class="form__input-group">
                <select class="form__input @error('witel') is-invalid @enderror" name="witel" id="witel">
                    <fieldset class="form-group">
                        <option value="ALL">ALL</option>
                        <option value="1">MEDAN</option>
                        <option value="2">ACEH</option>
                        <option value="3">BABEL</option>
                        <option value="4">BENGKULU</option>
                        <option value="5">LAMPUNG</option>
                        <option value="6">JAMBI</option>
                        <option value="8">RIDAR </option>
                        <option value="9">RIKEP </option>
                        <option value="10">SUMBAR </option>
                        <option value="11">SUMSEL </option>
                        <option value="12">SUMUT </option>
                </select>
                <div class="form__input-error-message"></div>
                <label for="psw">Please select the area</label>
            </div>
            <div class="form__input-group">
                <input type="date" class="form__input" autofocus placeholder="">
                <div class="form__input-error-message"></div>
            </div>
            <center>
                <h2>to</h2>
            </center>
            <div class="form__input-group">
                <input type="date" class="form__input" autofocus placeholder="">
                <div class="form__input-error-message"></div>
                <label for="">Please enter your selected dates</label>
            </div>
            <button class="form__button" href="{{ route('export') }}" type="submit">Download Data (.csv)</button>
        </form>
    </div>
    <script>
        //==========
        var inputval = [];
        $("#graph_table thead input").keyup(function(e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (code == 13) {
                inputval[$(this).data('col')] = this.value;

                oTable.fnClearTable(false);
                oTable.fnFilter(this.value, $(this).data('col'));
                e.preventDefault();
            }
        });

        $('#graph_table thead input').blur(function() {
            if (inputval[$(this).data('col')] != this.value) {
                inputval[$(this).data('col')] = this.value;

                oTable.fnClearTable(false);
                oTable.fnFilter(this.value, $(this).data('col'));
            }
        });

        $('#graph_table thead input').focus(function() {
            inputval[$(this).data('col')] = this.value;
        });

        $('#sample_2_column_toggler input[type="checkbox"]').change(function() {
            /* Get the DataTables object again - this is not a recreation, just a get of the object */
            var iCol = parseInt($(this).attr("data-column"));
            var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
            oTable.fnSetColumnVis(iCol, (bVis ? false : true));
        });
        $("button.reload").click(function() {
            oTable.fnClearTable(false);
            /* Filter on the column (the index) of this element */
            oTable.fnDraw();
        });

        $(".download").on("click", function() {
            window.location.replace("/download" + data + "&download=1");
        });



        var x = document.getElementById("reg").value;
        var y = document.getElementById("witel").value;

        if (x != "ALL") {
            $("#download").removeClass("disabled");
        }
        jQuery(document).ready(function() {
            $('body').addClass('page-header-fixed page-sidebar-fixed page-footer-fixed');
            App.init();
            $("#sortable_portlets").removeClass("row  column sortable");
            $("#sortable_portlets").find('div:first').removeClass("row  column sortable");

            getTable();

            $('#enableClickableOptGroups').multiselect({
                enableClickableOptGroups: true,
                enableCollapsibleOptGroups: true,
                includeSelectAllOption: true
            });

            $('.date-picker').datepicker({
                rtl: App.isRTL(),
                inline: true,
                autoclose: true
            });


            $("#locid").keypress(function(e) {
                if (e.which == 13) {
                    getTable();
                    return false;
                }
            });

            $("#ssid").keypress(function(e) {
                if (e.which == 13) {
                    getTable();
                    return false;
                }
            });

            //regional-wiel
            $("#reg").change(function() {
                $.ajax({
                    url: "/download",
                    content: 'json',
                    type: 'post',
                    data: $('form#form').serialize(),

                    beforeSend: function() {

                    },
                    complete: function(result) {

                    },
                    success: function(data) {

                        var html = "";
                        html += "<option value='ALL' selected >ALL</option>";
                        $.each(data.data, function(i, value) {
                            var tmp = "";
                            // if(selectedwitel==value.WITEL){
                            // 	tmp = "selected";
                            // }
                            html += "<option value='" + value.WITEL + "'  " + tmp + ">" + value.WITEL + "</option>";
                        });
                        $('#witel').html(html);

                        getTable();
                    },
                    error: function() {

                    }
                });
            });


        });
    </script>
    <center>
        <h6>
            <font size="3">2022 &copy; PrabaC - Idwifi<br>PT. Telekomunikasi Indonesia Tbk.</font>
        </h6>
    </center>
</body>

</html>