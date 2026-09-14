const themeStorageKey = "theme";
const themeToggle = document.querySelector("[data-theme-toggle]");
const systemPrefersDark = window.matchMedia("(prefers-color-scheme: dark)");

const getStoredTheme = () => localStorage.getItem(themeStorageKey);

const getCurrentTheme = () =>
    getStoredTheme() ?? (systemPrefersDark.matches ? "dark" : "light");

const applyTheme = (theme) => {
    document.documentElement.classList.toggle("dark", theme === "dark");

    if (themeToggle) {
        themeToggle.setAttribute("aria-pressed", String(theme === "dark"));
        themeToggle.setAttribute(
            "aria-label",
            `Switch to ${theme === "dark" ? "light" : "dark"} theme`,
        );
        themeToggle.title = `Switch to ${theme === "dark" ? "light" : "dark"} theme`;
    }
};

applyTheme(getCurrentTheme());

themeToggle?.addEventListener("click", () => {
    const nextTheme = document.documentElement.classList.contains("dark")
        ? "light"
        : "dark";

    localStorage.setItem(themeStorageKey, nextTheme);
    applyTheme(nextTheme);
});
