import asyncore
import smtpd

class FakeSMTPServer(smtpd.SMTPServer):
    def __init__(self, localaddr, remoteaddr, **kwargs):
        super().__init__(localaddr, remoteaddr, **kwargs)
        self.messages = []

    def process_message(self, peer, mailfrom, rcpttos, data, **kwargs):
        self.messages.append(data)
        print(f'Received message from {mailfrom} to {rcpttos}:')
        print(data.decode('utf-8'))
        print('---')

if __name__ == '__main__':
    print('Starting Fake SMTP Server on localhost:1025...')
    server = FakeSMTPServer(('localhost', 1025), None)
    try:
        asyncore.loop()
    except KeyboardInterrupt:
        pass