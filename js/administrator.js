function changeRole(newRoleId, userId) {
    // ���������� AJAX-������ �� ������
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/function/change_role.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("userId=" + userId + "&newRoleId=" + newRoleId);
}