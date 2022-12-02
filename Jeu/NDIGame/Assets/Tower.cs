using UnityEngine;

namespace NDIGame
{

    public class Tower : MonoBehaviour
    {

        [SerializeField] private GameObject projectilePrefab;
        [SerializeField] private float attackDelay = 0.2f;
        [SerializeField] private float range = 5f;
        [SerializeField] private int damage;

        [SerializeField] private int price;

        private Enemy focus;

        private float timer;

        public int Price => price;

        private void Update()
        {

            if(focus)
            {
                if(timer >= attackDelay)
                {
                    GameObject projObj = Instantiate(projectilePrefab, transform.position, Quaternion.identity);
                    Projectile proj = projObj.GetComponent<Projectile>();
                    proj.Damage = damage;
                    proj.Target = focus;
                    timer -= attackDelay;
                    return;
                }
                timer += Time.deltaTime;

            } else {
                foreach(Enemy enemy in GameManager.Instance.Enemies)
                {
                    if(Vector2.Distance(transform.position, enemy.transform.position) <= range)
                    {
                        focus = enemy;
                        break;
                    }

                }
            }

            
        }

        public void FocusEnemy(Enemy enemy)
        {
            if(enemy)
            {
                return;
            }
            focus = enemy;
        }

    }

}