export default class Validation {
    constructor() {
        this.empty();
    }

    getMessage(field) {
        if (this.messages[field]) {
            return this.messages[field][0];
        }
    }

    setMessages(messages) {
        this.messages = messages;
    }

    empty() {
        this.messages = {};
    }
}