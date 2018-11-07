<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="styles/kendo.common.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.min.css" />
    <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="js/jquery.min.js"></script>
    <script src="js/kendo.all.min.js"></script>
    

</head>
<body>
        <div id="example">
            <div id="grid"></div>
			<script type="text/javascript">
			    $.ajaxSetup({
			        headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });
			</script>
            <script>

                $(document).ready(function () {
                    var crudServiceBaseUrl = "",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: '{{route('read')}}',
                                    type: "post",
                                    dataType: "json"
                                },
                                update: {
                                    url: '{{route('create')}}',
                                    type: "POST"
                                },
                                destroy: {
                                    url: '{{route('destroy')}}',
                                    type: "POST",
                                    dataType: "json"
                                },
                                create: {
                                    url: '{{route('create')}}',
                                    type: "POST",
                                    dataType: "json"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                type: "json",
                                model: {
                                    id: "id",
                                    fields: {
                                        id: { editable: false },
                                        description: { validation: { required: true } },
                                        label_id: { validation: { required: true } },
                                        text: {validation: { required: true } },
                                        language_id: { validation: { required: true } }                                       
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
                        navigatable: true,
                        pageable: true,
                        height: 550,
                        toolbar: ["create", "save"],
                        columns: [
                            "id",                            
                            { field: "description", title: "description", width: "15%" },
                            { field: "label_id", title:"label_id", width: "15%" },
                            { field: "text", title:"text", width: "15%" },
                            { field: "language_id", title: "language_id", width: "15%", editor: languageDropDownEditor, template: "#=language_id#" },
                            { command: ["edit", "destroy"], title: "&nbsp;", width: "15%" }],
                        editable: "inline"
                    });
                });

                

              function languageDropDownEditor(container, options) {
                    $('<input required name="' + options.language_id + '"/>')
                        .appendTo(container)
                        .kendoDropDownList({
                            autoBind: false,
                            dataTextField: "code",
                            dataValueField: "id",
                            dataSource: {
                                type: "odata",
                                dataType: "json",
                                transport: {
                                    read: '{{route('language')}}'                                 
                                }
                            }
                        });
                }
            </script>
        </div>


</body>
</html>
