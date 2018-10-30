<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>
        
        <link rel="stylesheet" href="styles/kendo.common.min.css" />
        <link rel="stylesheet" href="styles/kendo.default.min.css" />
        <link rel="stylesheet" href="styles/kendo.default.mobile.min.css" />
        <link rel="stylesheet" href="styles/kendo.material.min.css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/kendo.all.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            .content {
                margin: 0 auto;
                border: 1px solid #000;
            }
                #fieldlist {
                    margin: 0 auto;
                    padding: 0;
                }

                #fieldlist li {
                    list-style: none;
                    padding-bottom: .7em;
                    text-align: left;
                }

                #fieldlist label {
                    display: block;
                    padding-bottom: .3em;
                    font-weight: bold;
                    text-transform: uppercase;
                    font-size: 12px;
                    color: #444;
                }

                #fieldlist li .k-widget:not(.k-tooltip),
                #fieldlist li .k-textbox {
                    margin: 0 5px 5px 0;
                }

                span.k-widget.k-tooltip-validation {
                    display: inline-block;
                    width: 160px;
                    text-align: left;
                    border: 0;
                    padding: 0;
                    margin: 0;
                    background: none;
                    box-shadow: none;
                    color: red;
                }
                
                .k-tooltip-validation .k-warning {
                    display: none;
                }
            </style>
    </head>
    <body>
        <div class="content">            
                <form id="employeeForm" data-role="validator" novalidate="novalidate">
                    <ul id="fieldlist">
                        <li>
                            <label for="FirstName">First Name:</label>
                            <input type="text" class="k-textbox" name="FirstName" id="FirstName" required="required" />
                        </li> 
                        <li>
                            <label for="LastName">Last Name:</label>
                            <input type="text" class="k-textbox" name="LastName" id="LastName" required="required" />
                        </li>   
                        <li>
                            <label for="HireDate">Hire Date:</label>
                            <input type="text" data-role='datepicker' id="HireDate" name="HireDate" data-type="date" required="required"  />
                            <span data-for='HireDate' class='k-invalid-msg'></span>
                        </li> 
                        <li>
                            <label for="RetireDate">Retire Date:</label>
                            <input type="text" data-role='datepicker' id ="RetireDate" data-type="date" name="RetireDate" data-greaterdate-field="HireDate" data-greaterdate-msg='Retire date should be after Hire date' />
                            <span data-for='RetireDate' class='k-invalid-msg'></span>
                        </li> 
                        <li>
                             <button type="button" class="k-primary" data-role="button" data-click='save'>Save</button>
                        </li>       
                    </ul>
                </form>
            </div>                      

            <script type="text/javascript">
                $(function () {
                    var container = $("#employeeForm");
                    kendo.init(container);
                    container.kendoValidator({
                        rules: {
                            greaterdate: function (input) {
                                if (input.is("[data-greaterdate-msg]") && input.val() != "") {                                    
                                    var date = kendo.parseDate(input.val()),
                                        otherDate = kendo.parseDate($("[name='" + input.data("greaterdateField") + "']").val());
                                    return otherDate == null || otherDate.getTime() < date.getTime();
                                }

                                return true;
                            }
                        }
                    });
                });

                function save(e) {
                    var validator = $("#employeeForm").data("kendoValidator");
                    if (validator.validate()) {
                        alert("Employee Saved");
                    }
                }
            
            </script>    
        
        </div>
    </body>
</html>
