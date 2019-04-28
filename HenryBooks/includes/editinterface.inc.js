
function prepareEditQuery(callerButton) {
  var row = callerButton.parentElement.parentElement.children;

  for (var i=0; i<row.length-2; i++) {
    row[i].innerHTML = "<input type='text' class='in-edit' value='"+row[i].innerHTML+"'/>";
  }
  callerButton.className = "tick";
  callerButton.innerHTML = "<i class='fa fa-check' aria-hidden='true'>";
  callerButton.setAttribute("onclick", "postEdit(this)");
}

function postEdit(callerButton) {
  var row = callerButton.parentElement.parentElement.children;
  var post = "includes/manageaction.inc.php?action=edit&row="+callerButton.name+"&";

console.log(row[0].children);
  for (var i=0; i<row.length-2; i++) {
    post += "q[" + i + "]=" + row[i].children[0].value + "&";
  }
  post = post.substring(0, post.length-1);
  window.location.href = post;
}
