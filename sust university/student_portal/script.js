function login() {
    const id = document.getElementById("studentId").value;
    localStorage.setItem("studentId", id);
    window.location.href = "dashboard.html";
}

function loadStudentData() {
    const id = localStorage.getItem("studentId");
    document.getElementById("studentIdDisplay").innerText = id;

    fetch("data.json")
        .then(response => response.json())
        .then(data => {
            const student = data[id];
            if (student) {
                document.getElementById("attendance").innerText = student.attendance;
                document.getElementById("courses").innerText = student.courses.join(", ");
                document.getElementById("teachers").innerText = student.teachers.join(", ");
                document.getElementById("fees").innerText = student.fees;
                document.getElementById("result").innerText = student.result;
            } else {
                alert("Student data not found!");
            }
        });
}