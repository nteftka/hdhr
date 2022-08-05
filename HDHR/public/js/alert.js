// パスワード変更
function password_alert(e){
  if(!window.confirm('本当に変更しますか？')){
    return false;
  }
  document.password.submit();
}

// 業務内容削除確認
function delete_alert(e){
  if(!window.confirm('本当に削除しますか？')){
    return false;
  }
  document.delete.submit();
}

// スタッフ削除
function delete_dh_alert(e){
  if(!window.confirm('本当に削除しますか？')){
    return false;
  }
  document.delete_dh.submit();
}

function contents_alert(e){
  if(!window.confirm('本当に削除しますか？')){
    return false;
  }
  document.contents_delete.submit();
}
