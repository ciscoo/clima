import { ClimaPage } from './app.po';

describe('clima App', function() {
  let page: ClimaPage;

  beforeEach(() => {
    page = new ClimaPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
