
            
                $(function () {
                $('form').bootstrapValidator({
                    message: 'This value is not valid',
                    feedbackIcons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        login_email: {
                            message: ' ',
                            validators: {
                                notEmpty: {
                                    message: '信箱不能爲空'
                                },
                              
                                regexp: {
                                    regexp:  /^([-.-_A-Za-z0-9])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/,
                                    message: '信箱格式錯誤'
                                }
                            }
                        },
                        
                        registered_email: {
                            message: '信箱不能為空',
                            validators: {
                                notEmpty: {
                                    message: '信箱不能爲空'
                                },
                              
                                regexp: {
                                    regexp:  /^([-.-_A-Za-z0-9])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/,
                                    message: '信箱格式錯誤'
                                }
                            }
                        },
                        registered_name: {
                            validators: {
                                notEmpty: {
                                message: '姓名不能爲空'
                             },
                            stringLength: {
                                min: 2,
                                max: 10,
                                message: '請輸入2字以上的姓名'
                             }
                            
                         }
                        },
                        password: {
                            validators: {
                                 notEmpty: {
                                 message: '密碼不能爲空'
                                 },
                                stringLength: {
                                    min: 6,
                                    max: 16,
                                    message:'密碼必須在6-16位之間'
                                },
                                regexp: {
                                    regexp: /^[\w]{6,16}$/,
                                    message: '密碼只能包含字母、數字'
                                },
                                identical:{
                                    field:'new_password',
                                    message:' '
    
                                }  
                            }
                        },
                        new_password: {
                            validators: {
                                notEmpty: {
                                 message: '密碼不能爲空'
                                 },
                              
                                identical:{
                                    field:'password',
                                    message:'密碼輸入不一致'
                                }  
                            }
                        }
                    }
                });
                
                $("#submit").on("click", function(){
                    $("form").bootstrapValidator('validate');
                    if($("form").data('bootstrapValidator').isValid()){
                        alert("註冊成功");
                    }
            });
            });
   