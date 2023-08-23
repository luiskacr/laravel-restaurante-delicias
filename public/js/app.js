/**
 * Delays the execution of code for the specified time.
 *
 * @param {number} time - The time in milliseconds to sleep.
 * @returns {Promise} A promise that resolves after the specified time has elapsed.
 */
function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}
