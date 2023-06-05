function check_input() {
    if (!document.loginSbmt.id.value) {
        alert("아이디를 입력하세요");
        document.loginSbmt.id.focus();
        return false; // 수정: 함수의 반환 값을 false로 변경
    }

    if (!document.loginSbmt.password.value) { // 수정: 'pass'를 'password'로 변경
        alert("비밀번호를 입력하세요");
        document.loginSbmt.password.focus(); // 수정: 'pass'를 'password'로 변경
        return false; // 수정: 함수의 반환 값을 false로 변경
    }
    document.loginSbmt.submit();
}
