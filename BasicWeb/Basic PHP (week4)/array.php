<?php
$nilaiSiswa = [85, 92, 58, 64, 90, 55, 88, 79, 70, 96];

$nilaiLulus = [];

foreach ($nilaiSiswa as $nilai) {
  if ($nilai >= 70) {
    $nilaiLulus[] = $nilai;
  }
}

echo "Daftar nilai siswa yang lulus: " . implode (",", $nilaiLulus);
$daftarKaryawan = [
  ['Alice', 7],
  ['Bob', 3],
  ['Charlie', 9],
  ['David', 5],
  ['Eva', 6],
];

$karyawanPengalamanLimaTahun = [];

foreach ($daftarKaryawan as $karyawan) {
  if ($karyawan[1] > 5) {
    $karyawanPengalamanLimaTahun[] = $karyawan[0];
  }
}
echo "<br>";
echo "Daftar Karyawan dengan pengalaman kerja lebih dari 5 tahun: " . implode(',',
$karyawanPengalamanLimaTahun);

echo "<br>";
echo "<br>";

// Multidimensional array storing scores of students in different subjects
$daftarNilai = [
    'Matematika' => [
        ['Alice', 85],
        ['Bob', 92],
        ['Charlie', 78],
    ],
    'Fisika' => [
        ['Alice', 90],
        ['Bob', 88],
        ['Charlie', 75],
    ],
    'Kimia' => [
        ['Alice', 92],
        ['Bob', 80],
        ['Charlie', 85],
    ],
];

// Specify the subject to display scores for
$mataKuliah = 'Fisika';

// Display the header indicating the subject
echo "Daftar nilai mahasiswa dalam mata kuliah $mataKuliah: <br>";

// Loop through the scores of the specified subject
foreach ($daftarNilai[$mataKuliah] as $nilai) {
    // Display each student's name and their score
    echo "Nama: {$nilai[0]}, Nilai: {$nilai[1]} <br>";
}


// Two-dimensional array with students' names and their grades
$studentsGrades = [
    ['Alice', 85],
    ['Bob', 92],
    ['Charlie', 78],
    ['David', 64],
    ['Eva', 90],
];

// Initialize variables for calculating the total score and number of students
$totalScore = 0;
$numberOfStudents = count($studentsGrades);

// Calculate the total score
foreach ($studentsGrades as $student) {
    $totalScore += $student[1]; // $student[1] refers to the grade
}

// Calculate the average grade
$averageGrade = $totalScore / $numberOfStudents;

// Display the class average
echo "Class average grade: " . number_format($averageGrade, 2) . "<br><br>";

// Display students who scored above the class average
echo "Students who scored above the class average:<br>";

foreach ($studentsGrades as $student) {
    // Check if the student's grade is above the average
    if ($student[1] > $averageGrade) {
        echo "Name: {$student[0]}, Grade: {$student[1]} <br>";
    }
}
