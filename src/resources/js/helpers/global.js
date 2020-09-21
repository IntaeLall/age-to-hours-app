export function formatDate(date) {
    if (!date) { return '' }
    return new Date(date).toLocaleDateString('en-GB')
}

export function birthdayToHours(birthday) {
    const currentDate = new Date();
    const birthDate = new Date(birthday).getTime();
    const years = Math.round((currentDate - birthDate) / (1000 * 60 * 60 * 24 * 365));
    const days = Math.round((currentDate - birthDate) / (1000 * 60 * 60 * 24));
    const hours = Math.round((currentDate - birthDate) / (1000 * 60 * 60));
    return `${years} years, or ${days} days or ${hours} hours old`
}