!(function (l) {
    "use strict";
    function e() {
        (this.$body = l("body")),
            (this.$modal = new bootstrap.Modal(document.getElementById("event-modal"), { backdrop: "static" })),
            (this.$calendar = l("#calendar")),
            (this.$formEvent = l("#form-event")),
            (this.$btnNewEvent = l("#btn-new-event")),
            (this.$btnDeleteEvent = l("#btn-delete-event")),
            (this.$btnSaveEvent = l("#btn-save-event")),
            (this.$modalTitle = l("#modal-title")),
            (this.$calendarObj = null),
            (this.$selectedEvent = null),
            (this.$newEventData = null);
    }
    (e.prototype.onEventClick = function (e) {
        this.$formEvent[0].reset(),
            this.$formEvent.removeClass("was-validated"),
            (this.$newEventData = null),
            this.$btnDeleteEvent.show(),
            this.$modalTitle.text("Edit Event"),
            this.$modal.show(),
            (this.$selectedEvent = e.event),
            l("#event-title").val(this.$selectedEvent.title);
    }),
        (e.prototype.onSelect = function (e) {
            this.$formEvent[0].reset(),
                this.$formEvent.removeClass("was-validated"),
                (this.$selectedEvent = null),
                (this.$newEventData = e),
                this.$btnDeleteEvent.hide(),
                this.$modalTitle.text("Add New Event"),
                this.$modal.show(),
                this.$calendarObj.unselect();
        }),
        (e.prototype.init = function () {
            var e = new Date(l.now());
            var t = typeof calendarEvents !== 'undefined' ? calendarEvents : [],
                a = this;
            (a.$calendarObj = myCalendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                titleFormat: function (date) {
                    return 'Payment Details';
                },
                dayHeaderContent: (args) => {
                    return moment(args.date).format('ddd')
                },
                slotDuration: "00:15:00",
                timeZone: 'UTC',
                initialDate: new Date(Date.UTC(2022, 8, 6)),
                themeSystem: "bootstrap",
                bootstrapFontAwesome: !1,
                buttonText: { week: "Week" },
                initialView: "timeGridWeek",
                handleWindowResize: !0,
                height: l(window).height() - 100,
                headerToolbar: { left: "title", right: "" }, //listMonth
                initialEvents: t,
                editable: !0,
                droppable: !0,
                selectable: !0,
                contentHeight: 1300,
                dateClick: function (e) {
                    a.onSelect(e);
                },
                eventClick: function (e) {
                    a.onEventClick(e);
                },
            })),
                a.$calendarObj.render(),
                a.$btnNewEvent.on("click", function (e) {
                    a.onSelect({ date: new Date(), allDay: !0 });
                }),
                a.$formEvent.on("submit", function (e) {
                    e.preventDefault();
                    var t,
                        n = a.$formEvent[0];
                    n.checkValidity()
                        ? (a.$selectedEvent
                            ? (a.$selectedEvent.setProp("title", l("#event-title").val()), a.$selectedEvent.setProp("classNames", ['bg-success']))
                            : ((t = { title: l("#event-title").val(), start: a.$newEventData.date, allDay: a.$newEventData.allDay, className: 'bg-success' }), a.$calendarObj.addEvent(t)),
                            a.$modal.hide())
                        : (e.stopPropagation(), n.classList.add("was-validated"));
                }),
                l(
                    a.$btnDeleteEvent.on("click", function (e) {
                        a.$selectedEvent && (a.$selectedEvent.remove(), (a.$selectedEvent = null), a.$modal.hide());
                    })
                );
        }),
        (l.CalendarApp = new e()),
        (l.CalendarApp.Constructor = e);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.CalendarApp.init();
    })();