import moment from 'moment';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import bootstrapPlugin from '@fullcalendar/bootstrap';
import momentPlugin from '@fullcalendar/moment';
import deLocale from '@fullcalendar/core/locales/de';
import Popper from 'popper.js';
import $ from 'jquery';

var calendarEl = document.getElementById('calendar');

var calendar = new Calendar(calendarEl, {
    plugins: [ dayGridPlugin, bootstrapPlugin, momentPlugin ],
    locale: deLocale,
    themeSystem: 'bootstrap',
    startTime: '8:00',
    endTime: '18:00',
    weekends: false,
    validRange: (nowDate) => {
        return {
            start: nowDate
        };
    },
    eventRender: (info) => {
        console.log(info);
        $(info.el).popover({
            title: info.event.title,
            trigger: 'hover',
            placement: 'top',
            html: true,
            content: popoverContent(info)
        });
    },
    events: (info, successCallback) => {
        const events = [];
        for (let i = 0; i < 4; i++) {
            events.push({
                groupId: i % 2,
                title: (i % 2 ? `Webinar #${i}` : `Buyer Advice #${i}`),
                start: moment().set(info.start).add(i + 3, 'days').format('YYYY-MM-DD h:m:s'),
                description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor',
                classNames: [ (i % 2 ? 'fc-webinar' : 'fc-buyer-advice') ]
            });
        }
        successCallback(events)
    }
});

const popoverContent = (info) => {
    console.log(info);
    return `
        <ul class="event-details">
        </ul>
        <p class="description">${info.event.extendedProps.description}</p>
    `;
}

window.setTimeout(() => {
    calendar.render();
}, 300);