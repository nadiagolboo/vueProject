<script>
import axiosInstance from 'axios';
export default {
    data() {
        return {
            studentId: '',
            student: null,
        };
    },
    methods: {
        async fetchStudentInfo() {
            try {
                const response = await axiosInstance.get(`http://127.0.0.1:8000/api/student/${this.studentId}`);
                this.student = response.data;
                console.log(this.student)
                this.$emit('studentFetched', this.student);
            } catch (err) {
                console.log(err)
            }
        },
    },
};
</script>
<template>
    <div class="student-form-container">
        <form class="student-search" @submit.prevent="fetchStudentInfo" >
            <div class="form-group">
                <label>شناسه دانشجویی:</label>
                <input v-model="studentId" placeholder="شناسه دانشجویی" required />
                <button type="submit" class="search-btn">جستجو</button>
            </div>
        </form>


        <div v-if="student" class="student-details">
            <h3>اطلاعات دانشجو</h3>
            <div class="details-fields">
                <div class="detail-item">
                    <span>نام:</span>
                    <span>{{ student.first_name }}</span>
                </div>
                <div class="detail-item">
                    <span>نام خانوادگی:</span>
                    <span>{{ student.last_name }}</span>
                </div>
                <div class="detail-item">
                    <span>شماره دانشجویی:</span>
                    <span>{{ student.student_number }}</span>
                </div>
                <div class="detail-item">
                    <span>رشته تحصیلی:</span>
                    <span>{{ student.major }}</span>
                </div>
                <div class="detail-item">
                    <span>سال ورود:</span>
                    <span>{{ student.entry_year }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
