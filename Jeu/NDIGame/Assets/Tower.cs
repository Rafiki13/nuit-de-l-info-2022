using UnityEngine;

namespace NDIGame
{

    public class Tower : MonoBehaviour
    {

        [SerializeField] private float attackSpeed;
        [SerializeField] private float range = 5f;
        [SerializeField] private int damages;

        private Enemy focus;

        private float timer;

        private void Update()
        {
            if(!focus)
            {
                foreach(Enemy enemy in GameManager.Instance.Enemies)
                {
                    if(Vector2.Distance(transform.position, enemy.transform.position) <= range)
                    {
                        focus = enemy;
                        break;
                    }

                }

            }

            if(focus && timer >= attackSpeed)
            {
                focus.Damage(damages);
                timer -= attackSpeed;
                return;
            }
            timer += Time.deltaTime;
        }

        public void FocusEnemy(Enemy enemy)
        {
            if(enemy)
            {
                return;
            }
            focus = enemy;
        }

        private void OnDrawGizmos()
        {
            for(int i = 0; i < 50; i++)
            {
                int j = (i + 1) % 50;

                //Vector3 pointA = transform.position + new 
                //Vector3 pointB = 

                //Vector3 pointA = transform.position + Vector3.left * 1.0f;

            }

        }

    }

}