export function formatDate(date) {
    if (!date) { return '' }
    return new Date(date).toLocaleDateString('en-GB')
}

export function birthdayToHours(birthday) {
    const currentDate = new Date();
    const birthDate = new Date(birthday).getTime();
    return Math.round((currentDate - birthDate) / (1000 * 60 * 60));
}