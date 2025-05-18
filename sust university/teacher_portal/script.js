function loginTeacher() {
    const id = document.getElementById("teacherId").value;
    localStorage.setItem("teacherId", id);
    window.location.href = "dashboard.html";
}

function loadTeacherData() {
    const id = localStorage.getItem("teacherId");
    document.getElementById("teacherIdDisplay").innerText = id;

    fetch("data.json")
        .then(response => response.json())
        .then(data => {
            const teacher = data[id];
            if (teacher) {
                document.getElementById("courses").innerText = teacher.courses.join(", ");
            } else {
                alert("Teacher data not found!");
            }
        });
}

function uploadMaterial() {
    const fileInput = document.getElementById("materialUpload");
    if (fileInput.files.length > 0) {
        showMessage("Material uploaded: " + fileInput.files[0].name);
    } else {
        showMessage("Please select a file to upload.");
    }
}

function markAttendance() {
    const course = document.getElementById("courseName").value;
    const data = document.getElementById("attendanceData").value;
    if (course && data) {
        showMessage("Attendance submitted for " + course + ": " + data);
    } else {
        showMessage("Please fill both fields.");
    }
}

function showMessage(msg) {
    document.getElementById("messageBox").innerText = msg;
}