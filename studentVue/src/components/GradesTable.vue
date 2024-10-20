<script>
export default {
    props: ['grades'],
    data() {
        return {
            totalCredits: null,
        };
    },
    computed: {
        studentGrades() {
            return this.grades;
        },
    },
    methods: {
        getAverage() {
            if (this.studentGrades.length === 0) return '-';
            let totalGrades = 0;
            let totalCredits = 0;
            this.studentGrades.forEach(grade => {
                totalGrades += grade.grade * grade.course.credits;
                totalCredits += grade.course.credits;
            });
            this.totalCredits = totalCredits
            return (totalGrades / totalCredits).toFixed(2);
        },
    },
};
</script>
<template>
    <div v-if="studentGrades.length == 0" class="grades-info-wrapper">
        <p>اطلاعاتی موجود نیست</p>
    </div>
    <div v-if="studentGrades.length > 0" class="grades-info-wrapper">
        <h3>ریز نمرات دانشجو</h3>
        <table class="grades-list">
            <thead>
            <tr>
                <th>نام درس</th>
                <th>نمره</th>
                <th>پیش‌نیاز</th>
                <th>تعداد واحد</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="grade in grades" :key="grade.id">
                <td>{{ grade.course.course_name }}</td>
                <td>{{ grade.grade }}</td>
                <td>{{ grade.course.prerequisite_course ? grade.course.prerequisite_course.course_name : 'ندارد' }}</td>
                <td>{{ grade.course.credits }}</td>
            </tr>
            <tr>
                <td>معدل</td>
                <td>{{ getAverage() }}</td>
                <td>کل واحد ها</td>
                <td>{{totalCredits}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
