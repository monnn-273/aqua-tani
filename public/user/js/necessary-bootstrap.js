/**
 * --------------------------------------------------------------------------
 * Bootstrap alert.js
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

/**
 * Constants
 */

const NAME$f = "alert";
const DATA_KEY$a = "bs.alert";
const EVENT_KEY$b = `.${DATA_KEY$a}`;
const EVENT_CLOSE = `close${EVENT_KEY$b}`;
const EVENT_CLOSED = `closed${EVENT_KEY$b}`;
const CLASS_NAME_FADE$5 = "fade";
const CLASS_NAME_SHOW$8 = "show";

/**
 * Class definition
 */

class Alert extends BaseComponent {
    // Getters
    static get NAME() {
        return NAME$f;
    }

    // Public
    close() {
        const closeEvent = EventHandler.trigger(this._element, EVENT_CLOSE);
        if (closeEvent.defaultPrevented) {
            return;
        }
        this._element.classList.remove(CLASS_NAME_SHOW$8);
        const isAnimated = this._element.classList.contains(CLASS_NAME_FADE$5);
        this._queueCallback(
            () => this._destroyElement(),
            this._element,
            isAnimated
        );
    }

    // Private
    _destroyElement() {
        this._element.remove();
        EventHandler.trigger(this._element, EVENT_CLOSED);
        this.dispose();
    }

    // Static
    static jQueryInterface(config) {
        return this.each(function () {
            const data = Alert.getOrCreateInstance(this);
            if (typeof config !== "string") {
                return;
            }
            if (
                data[config] === undefined ||
                config.startsWith("_") ||
                config === "constructor"
            ) {
                throw new TypeError(`No method named "${config}"`);
            }
            data[config](this);
        });
    }
}

/**
 * Data API implementation
 */

enableDismissTrigger(Alert, "close");

/**
 * jQuery
 */

defineJQueryPlugin(Alert);
