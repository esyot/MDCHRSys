<template>
    <div class="personal-details-items" v-if="editMode">
        <div class="title-container">
            <span class="title"
                >SPECIAL TRAINING COURSES, SEMINARS, SYMPOSIA PARTICIPATED (Last
                5 Years) FORM</span
            >
        </div>
        <div class="form-control">
            <span class="italic"
                >(Note: Start from the most recent training and include only the
                relevant training or program.)</span
            >
        </div>
        <div>
            <button @click="addField">Add Field</button>
        </div>
        <div
            v-for="(userSP, index) in userDetails.user_special_trainings"
            :key="index"
            class="form-group"
        >
            <div class="form-group">
                <label for="title"
                    >TITLE OF TRAINING/SEMINARS/CONFERENCES ATTENDED (Write in
                    Full):</label
                >
                <input
                    type="text"
                    id="title"
                    name="title"
                    v-model="userSP.title"
                    class="form-control"
                    placeholder="Title of the Training Course, Seminar, Symposium, etc."
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <div class="form-group">
                <label for="attendance_from">INCLUSIVE DATE FROM:</label>
                <input
                    type="date"
                    id="attendance_from"
                    name="attendance_from"
                    v-model="userSP.attendance_from"
                    class="form-control"
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <div class="form-group">
                <label for="attendance_to">INCLUSIVE DATE TO:</label>
                <input
                    type="date"
                    id="attendance_to"
                    name="attendance_to"
                    v-model="userSP.attendance_to"
                    class="form-control"
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <div class="form-group">
                <label for="days">NUMBER OF DAYS:</label>
                <input
                    type="number"
                    name="days"
                    id="days"
                    v-model="userSP.days"
                    class="form-control"
                    placeholder="eg., 30"
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <div class="form-group">
                <label for="type">TYPE OF TRAINING:</label>
                <input
                    type="text"
                    name="type"
                    id="type"
                    v-model="userSP.type"
                    class="form-control"
                    placeholder="eg., Managerial/Supervisor/Technical, etc."
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <div class="form-group">
                <label for="conducted_by"
                    >CONDUCTED/SPONSORED BY (Write in Full):</label
                >
                <input
                    type="text"
                    name="conducted_by"
                    id="conducted_by"
                    v-model="userSP.conducted_by"
                    class="form-control"
                    placeholder="eg., Mr/Mrs. Example "
                    @input="handleFieldFocus(`user_special_trainings`)"
                />
            </div>
            <hr />
        </div>
    </div>
    <div class="personal-details-items" v-if="editMode == false">
        <div class="title-container">
            <span class="title"
                >SPECIAL TRAINING COURSES, SEMINARS, SYMPOSIA PARTICIPATED (Last
                5 Years)</span
            >
        </div>
        <div
            v-for="userSpecialTraining in personalDetails.user_special_trainings"
            :key="userSpecialTraining.id"
            class="form-group"
        >
            <label> {{ userSpecialTraining.title }}</label>
            <span>
                {{ userSpecialTraining.attendance_from }} ||
                {{ userSpecialTraining.attendance_to }} ||
                {{ userSpecialTraining.days }} ||
                {{ userSpecialTraining.type }} ||
                {{ userSpecialTraining.conducted_by }}
            </span>
        </div>
    </div>
</template>

<script>
export default {
    emits: ["update-user-details"],
    props: {
        userDetails: Object,
        editMode: Boolean,
        personalDetails: Object,
    },
    methods: {
        handleFieldFocus(fieldName) {
            this.$emit("track-touched-field", fieldName);
        },

        handleFieldChange(fieldName) {
            this.$emit("update-user-details", {
                [fieldName]: this.userDetails[fieldName],
            });
        },
        addField() {
            this.userDetails.user_special_trainings.push({
                title: "",
                attendance_from: "",
                attendance_to: "",
                days: "",
                type: "",
                conducted_by: "",
            });
        },
    },
    watch: {
        personalDetails: {
            handler(newVal) {
                this.userDetails.user_special_trainings =
                    newVal.user_special_trainings || [];
            },
            immediate: true,
        },
    },
};
</script>

<style scoped>
.italic {
    font-style: italic;
    font-size: 12px;
    margin-left: 20px;
}
</style>
