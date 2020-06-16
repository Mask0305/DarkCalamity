
        function gis_chk(){  //註冊檢查

                var mail=document.send.email.value;
                var e_pattern = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
                var account = document.send.account.value;
                var a_pattern = /^[\w]{4,15}/;/*4~16*/
                var name = document.send.nickname.value;
                var n_pattern = /^[\u4e00-\u9fa5]{2,7}$|^[\dA-Za-z_]{2,14}$/;//
                var password = document.send.password.value;
                var p_pattern = /^[\w]{4,15}/;
                var repassword= document.send.repassword.value;

                if(e_pattern.test(mail)==false || mail==""){
                alert("E-mail格式錯誤");
                document.send.email.focus();
                return false;
                }

                if(n_pattern.test(name)==false || name==""){
                alert("名稱格式錯誤,請設置字數為2~8位");
                document.send.nickname.focus();
                return false;
                }

                if(a_pattern.test(account)==false || account==""){
                alert("帳號格式錯誤,請設置英數混和且字數為4~16位");
                document.send.account.focus();
                return false;
                }

                if(p_pattern.test(password)==false || password==""){
                alert("密碼格式錯誤,請設置英數混和且字數4~16位");
                document.send.password.focus();
                return false;
                }

                if(password!=repassword){
                alert('密碼不相符,請再次確認');
                return false;
                }

            return true;
        }

          function login_chk(){  //登入檢查

                var account = document.send.account.value;
                var a_pattern = /^[\w]{4,15}/;/*4~16*/
                var password = document.send.password.value;
                var p_pattern = /^[\w]{4,15}/;

                if(a_pattern.test(account)==false || p_pattern.test(password)==false){
                alert("帳號或密碼錯誤,請重新填寫");
                document.send.account.focus();
                return false;
                }

            return true;
        }


