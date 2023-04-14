import asyncio
from aiosmtpd.controller import Controller

class MyHandler:
    async def handle_DATA(self, server, session, envelope):
        print()
        print(f'Received message from: {envelope.mail_from}')
        print(f'Recipient addresses: {envelope.rcpt_tos}')
        print(f'Message data: {envelope.content.decode()}')
        print('----------------------------------------------------------------')
        return '250 Message accepted for delivery'

async def main():
    handler = MyHandler()
    controller = Controller(handler, hostname='127.0.0.1', port=1025)
    controller.start()
    print('SMTP server started on localhost port 1025.... Press Ctrl+C to stop.')
    try:
        while True:
            await asyncio.sleep(1)
    except KeyboardInterrupt:
        print('Stopping SMTP server')
        controller.stop()
        print('SMTP Server stopped... Goodbye')

asyncio.run(main())