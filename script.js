function loadStudents() {
  fetch('read.php')
    .then(res => res.json())
    .then(data => {
      let rows = '';

      data.forEach(s => {
        rows += `
        <tr>
          <td>${s.id}</td>
          <td>${s.name}</td>
          <td>${s.email}</td>
          <td>${s.course}</td>
          <td class="actions">
            <a href="#" class="edit-btn"
               onclick="editStudent(${s.id}, 
               '${escapeQuotes(s.name)}', 
               '${escapeQuotes(s.email)}', 
               '${escapeQuotes(s.course)}')">
               Edit
            </a>

            <a href="#" class="delete-btn"
               onclick="deleteStudent(${s.id})">
               Delete
            </a>
          </td>
        </tr>`;
      });

      document.getElementById('studentTable').innerHTML = rows;
    });
}



/* ================= EDIT ================= */
function editStudent(id, name, email, course) {
  document.getElementById('studentId').value = id;
  document.getElementById('name').value = name;
  document.getElementById('email').value = email;
  document.getElementById('course').value = course;
}

/* ================= DELETE ================= */
function deleteStudent(id) {
  if (confirm('Are you sure you want to delete this student?')) {
    fetch('delete.php?id=' + id)
      .then(() => loadStudents());
  }
}

/* ================= SAFE QUOTES ================= */
function escapeQuotes(text) {
  return text.replace(/'/g, "\\'");
}

/* ================= LOAD DATA ================= */
loadStudents();
