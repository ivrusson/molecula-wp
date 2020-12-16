import request from './request';

export async function query() {
  request.use(async (ctx, next) => {
    console.log('query', ctx);
    await next();
  });
  return request('/users');
}
