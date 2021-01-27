const confirmPassword = confirm =>{
  var input1 = password.value;
  var input2 = confirm.value;
  if(input1 != input2){
    confirm.setCustomValidity("パスワードが一致しません");
  } else{
    confirm.setCustomValidity("");
  }
};