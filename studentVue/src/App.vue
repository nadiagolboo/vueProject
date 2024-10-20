<template>
    <div id="mainApp" class="main-wrapper">
        <student-search @studentFetched="processStudent"></student-search>
        <grades-info v-if="studentGrades.length > 0" :grades="studentGrades"></grades-info>
    </div>
</template>

<script>
import StudentSearch from './components/StudentForm.vue';
import GradesInfo from './components/GradesTable.vue';
import axiosInstance from 'axios';
export default {
    components: {
        StudentSearch,
        GradesInfo,
    },
    data(){
        return{
            studentGrades:[],
        };
    },
    methods:{
        processStudent(studentData){
            this.retrieveStudentGrades(studentData.id);
        },
        async retrieveStudentGrades(studentId) {
            try {
                const gradeResponse = await axiosInstance.get(`http://127.0.0.1:8000/api/student/${studentId}/ListGrades`);
                this.studentGrades = gradeResponse.data;
            } catch (err) {
                console.log(err)
            }
        },
    },
};
</script>

<style>
.main-wrapper {
    direction: rtl;
    text-align: right;
    padding: 25px;
    background-color: #fafafa;
}

h3 {
    text-align: right;
    margin-bottom: 18px;
}

.student-search-container {
    text-align: right;
    margin-bottom: 25px;
}

.student-search {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
}

.form-group {
    display: flex;
    align-items: center;
}

input[type="text"] {
    padding: 6px;
    margin-left: 12px;
    border: 1px solid #bbb;
    border-radius: 5px;
}

.search-btn {
    margin-left: 12px;
    padding: 6px 18px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.4s ease;
}

.search-btn:hover {
    background-color: #218838;
}

.student-details {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 6px;
    border: 1px solid #ccc;
    direction: rtl;
}

.student-details h3 {
    margin-top: 0;
    text-align: right;
}

.details-fields {
    display: flex;
    flex-direction: column;
}

.detail-item {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 6px;
}




.grades-info-wrapper {
    text-align: right;
    margin-bottom: 25px;
    direction: rtl;
}

.grades-list {
    width: 100%;
    margin-top: 12px;
    border-collapse: collapse;
}
.grades-list th, .grades-list td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.grades-list thead th {
    background-color: #e0e0e0;
}

.final-grade {
    text-align: right;
    margin-top: 12px;
    font-weight: bold;
}
</style>

