import Plugin from 'src/plugin-system/plugin.class';
// import DomAccess from 'src/helper/dom-access.helper';

import moment from 'moment';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import listPlugin from '@fullcalendar/list';
import bootstrapPlugin from '@fullcalendar/bootstrap';
import momentPlugin from '@fullcalendar/moment';
import deLocale from '@fullcalendar/core/locales/de';
import $ from 'jquery';

export default class ServiceBookingPlugin extends Plugin {
    static options = {
        plugins: [dayGridPlugin, listPlugin, bootstrapPlugin, momentPlugin],
        locale: deLocale,
        themeSystem: 'bootstrap',
        startTime: '8:00',
        endTime: '18:00',
        weekends: false,
        eventLimit: true, // for all non-TimeGrid views
        defaultView: 'listMonth',
        header: {
            left: 'dayGridMonth',
            center: 'title',
            right: 'today prev,next listMonth',
            buttonIcons: {
            },
        },
        views: {
            dayGrid: {
                eventLimit: 3, // adjust to 3 only for timeGridWeek/timeGridDay
            },
        },
        
    }

    init() {
        const config = {
            ...this.options,
            ...{
                eventRender: this.eventRender.bind(this),
                events: this.initialzeEvents,
                validRange: this.validRange,
            },
        }

        this.calendar = new Calendar(this.el, config);

        this.calendar.render();
    }

    initialzeEvents(info, successCallback) {
        const events = [];

        for (let i = 0; i < 100; i++) {
            for (let j = 0; j < 4; j++) {
                events.push({
                    groupId: i % 2,
                    title: (i % 2 ? `Webinar #${i}` : `Buyer Advice #${i}`),
                    start: moment().add(i + 3, 'days').add(2, 'hours').format(),
                    end: moment().add(i + 3, 'days').add(4, 'hours').format(),
                    description: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor',
                    classNames: [(i % 2 ? 'fc-webinar' : 'fc-buyer-advice')],
                });
            }
        }

        successCallback(events);
    }

    popoverContent(info) {
        return `
              <ul class="event-details">
                  <li>Start: ${moment(info.event.start).format('H:m:s')}</li>
                  <li>End: ${moment(info.event.end).format('H:m:s')}</li>
              </ul>
              <p class="description">${info.event.extendedProps.description}</p>
          `;
    }

    validRange(nowDate) {
        return {
            start: nowDate,
        };
    }

    eventRender(info) {
        $(info.el).popover({
            title: info.event.title,
            trigger: 'hover',
            placement: 'top',
            html: true,
            content: this.popoverContent(info),
        });
    }
}