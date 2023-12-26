<template>
    <div>
        <h1>แผนกทั้งหมด</h1>
        <ul>
            <li v-for="(department, index) in departments" :key="index">
                {{ department.dept_name }}
            </li>
        </ul>

        <h1>พนักงานชายที่ขึ้นต้นด้วย 'A'</h1>
        <ul>
            <li v-for="(employee, index) in maleEmployees" :key="index">
                {{ employee.first_name }} {{ employee.last_name }} ({{ employee.gender }})
            </li>
        </ul>

        <h1>พนักงานหญิงที่มีอายุมากกว่า 50 ปี</h1>
        <ul>
            <li v-for="(employee, index) in femaleEmployees" :key="index">
                {{ employee.first_name }} {{ employee.last_name }} ({{ employee.gender }}, {{ employee.age }} ปี)
            </li>
        </ul>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const { departments, maleEmployees, femaleEmployees } = defineProps(["departments", "maleEmployees", "femaleEmployees"]);
</script>

<style>

</style>
