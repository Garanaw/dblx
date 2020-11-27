
window.createContentForm = {
    isDialogOpen: false,
    fileType: null,
    files: [],
    currentFile: null,
    addFile() {
        this.files.push(this.currentFile);
        this.currentFile = null;
    }
};
